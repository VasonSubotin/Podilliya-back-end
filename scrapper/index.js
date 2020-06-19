const request = require('request-promise');
const cheerio = require('cheerio');
const {Sequelize} = require('sequelize');
const {ScrappedDataModel} = require('./scrappedDataModel');
const {parseScript} = require('shift-parser');

// ScrappedDataModel.create({scrapped_data : {field1: 'value', field2: 'value2'}, created_at: new Date(), updated_at: new Date()});


const languages = {
    en: {
        prefix: 'en',
        URL: 'https://graintrade.com.ua/en/birzha',
        culture_sunflower_oil_cake: 'https://graintrade.com.ua/en/birzha/kuplyu-makuhu-sonyashnikovu-prodam-makuhu-sonyashnikovu-v-ukraini-f27', // жмых
        culture_oil: 'https://graintrade.com.ua/en/birzha/kuplyu-oliyu-sonyashnikovu-prodam-oliyu-sonyashnikov-v-ukraini-f22', //подсолнучное масло
    },
    ua: {
        prefix: 'ua',
        URL: 'https://graintrade.com.ua/birzha',
        culture_sunflower_oil_cake: 'https://graintrade.com.ua/birzha/kuplyu-makuhu-sonyashnikovu-prodam-makuhu-sonyashnikovu-v-ukraini-f27', // жмых
        culture_oil: 'https://graintrade.com.ua/birzha/kuplyu-oliyu-sonyashnikovu-prodam-oliyu-sonyashnikov-v-ukraini-f22', //подсолнучное масло
    }
}



const URL = languages.en.culture_sunflower_oil_cake;
const graintrade = 'https://graintrade.com.ua';

const headers = {
    'Host': 'graintrade.com.ua',
    'User-Agent': 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:76.0) Gecko/20100101 Firefox/76.0',
    'Accept': 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
    'Accept-Language': 'en-US,en;q=0.5',
    'Accept-Encoding': 'gzip, deflate, br',
    'DNT': '1',
    'Connection': 'keep-alive',
    'Referer': 'https://graintrade.com.ua/en/site/login', // lang todo
    'Cookie': 'cookie_side=1; cseconds=115',
    'Upgrade-Insecure-Requests': '1',
    'Pragma': 'no-cache',
    'Cache-Control': 'no-cache',
    'TE': 'Trailers',
};


(async () => {
    const response = await request({
        uri: URL, //lang toto
        headers: headers,
        gzip: true
    });
    let $ = cheerio.load(response);

    let links = $('#yw2 a');
    let extractedLinks = [];

    console.log('Extracting first five links')
    links.each((index, link) => {

        //extracting first five page
        let exctractFirstFive = index < 6 && index >= 1
        if(exctractFirstFive) {
            let href = $(link).attr('href')
            extractedLinks.push(graintrade + href); 
        } else {
            return;
        }
    });

    let contentLinks = [];

    //gather link for full content extraction
    console.log('Extracting content links')
    for (const link of extractedLinks) {
        const response = await request({
            uri: link,
            headers: headers,
            gzip: true,
        });
        let $ = cheerio.load(response);

        let sourceLinksNodes = $('#btpicture-grid > .items > tbody > tr');

        sourceLinksNodes.each((index, node) => {
            let urlName = node.children[10].children[0].data
            let id = 'id' + node.children[11].children[0].data;
            let fullUrl = graintrade + '/en/birzha/' + urlName + '-' + id
            
            contentLinks.push(fullUrl); // todo lang fix
        });
    }

    console.log('Scrapping content start')
    for(const contentUrl of contentLinks) {
    
        const response = await request({
            uri: contentUrl,
            headers: headers,
            gzip: true,
        });
        let $ = cheerio.load(response);
        
        
        let offerType = $('.views-birzha').html().toLowerCase().search('buy') >= 0 ? 'buy' : 'sell';
        // let linkToBuyerSeller = $('.Main-singleContent');
        let script = parseScript($('.Main-singleContent > script:nth-child(1)').contents()[0].data);//company info link



        let culture = $('.item_deteils_ > div:nth-child(1) > div:nth-child(1) > b:nth-child(1)').text().trim();
        let volume = $('.item_deteils_ > div:nth-child(1) > div:nth-child(2) > b:nth-child(1)').text().trim();
        let price = $('.item_deteils_ > div:nth-child(1) > div:nth-child(3) > b:nth-child(1)').text().trim();
        let vat = $('.item_deteils_ > div:nth-child(1) > div:nth-child(4) > b:nth-child(1)').text().trim();
        let description = $('.addInfoTextView > div:nth-child(2) > p:nth-child(1)').text().trim();
        let deliveryTerms = $('.item_deteils_ > div:nth-child(2) > div:nth-child(1) > b:nth-child(1)').text().trim();
        let location = $('.item_deteils_ > div:nth-child(2) > div:nth-child(2) > b:nth-child(1)').text().trim();
        location += $('.item_deteils_ > div:nth-child(2) > div:nth-child(2) > b:nth-child(2)').text().trim();
        let processingCompany = $('.item_deteils_ > div:nth-child(2) > div:nth-child(3) > b:nth-child(1) > a:nth-child(1)').text().trim();
        let deliveryDueData = $('.item_deteils_ > div:nth-child(2) > div:nth-child(4) > b:nth-child(1)').text().trim();
        let monthOfDelivery = $('.item_deteils_ > div:nth-child(2) > div:nth-child(5) > b:nth-child(1)').text().trim();
        let validUntil = $('.item_deteils_ > div:nth-child(2) > div:nth-child(6) > b:nth-child(1)').text().trim();

        //trader if 
        let companyLink = script.statements[1].expression.arguments[0].body.statements[19].expression.arguments[1].body.statements[0].expression.expression.value
        
        const responseCompanyDetails = await request({
            uri:  graintrade + companyLink,
            headers: headers,
            gzip: true,
        });
        let $company = cheerio.load(responseCompanyDetails);

        let companyName = $company('.LastDeals > tbody:nth-child(1) > tr:nth-child(1) > td:nth-child(2) > label:nth-child(1) > b:nth-child(1)').text().trim();
        let companyAddress = $company('.LastDeals > tbody:nth-child(1) > tr:nth-child(2) > td:nth-child(2) > label:nth-child(1) > b:nth-child(1)').text().trim();
        let companyContact = $company('.LastDeals > tbody:nth-child(1) > tr:nth-child(3) > td:nth-child(2) > label:nth-child(1) > b:nth-child(1)').text().trim();
        let companyTelephone = $company('.LastDeals > tbody:nth-child(1) > tr:nth-child(4) > td:nth-child(2) > label:nth-child(1) > b:nth-child(1)').text().trim();
        let companyWebsite = $company('.LastDeals > tbody:nth-child(1) > tr:nth-child(5) > td:nth-child(2) > label:nth-child(1) > b:nth-child(1) > a:nth-child(1)').text().trim();
        let companyRegisteredNo = $company('.LastDeals > tbody:nth-child(1) > tr:nth-child(6) > td:nth-child(2) > label:nth-child(1) > b:nth-child(1)').text().trim();
        let companyDirector = $company('.LastDeals > tbody:nth-child(1) > tr:nth-child(7) > td:nth-child(2) > label:nth-child(1) > b:nth-child(1)').text().trim();
        let companyOwner = $company('.LastDeals > tbody:nth-child(1) > tr:nth-child(8) > td:nth-child(2) > label:nth-child(1) > b:nth-child(1)').text().trim();
        let companyType = $company('.LastDeals > tbody:nth-child(1) > tr:nth-child(9) > td:nth-child(2) > label:nth-child(1) > b:nth-child(1)').text().trim();

        let scrappedData = {
            offerType,
            culture,
            volume,
            price,
            vat,
            description,
            deliveryTerms,
            location,
            processingCompany,
            deliveryDueData,
            monthOfDelivery,
            validUntil,
            companyName,
            companyAddress,
            companyContact,
            companyTelephone,
            companyWebsite,
            companyRegisteredNo,
            companyDirector,
            companyOwner,
            companyType
        }


        await ScrappedDataModel.create({scrapped_data: scrappedData, created_at: new Date(), updated_at: new Date()});
        
        // console.log(culture, volume, price, vat, description, deliveryTerms, location, processingCompany);

        debugger;
    }

})();