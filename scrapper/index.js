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
            let fullUrlEn = graintrade + '/en/birzha/' + urlName + '-' + id
            let fullUrlUk = graintrade + '/birzha/' + urlName + '-' + id

            contentLinks.push({fullUrlEn, fullUrlUk}); // todo lang fix
        });
    }

    console.log('Scrapping content start')
    for(const contentUrl of contentLinks) {
    
        const responseEn = await request({
            uri: contentUrl.fullUrlEn,
            headers: headers,
            gzip: true,
        });

        const responseUk = await request({
            uri: contentUrl.fullUrlUk,
            headers: headers,
            gzip: true,
        });

        let $en = cheerio.load(responseEn);
        let $uk = cheerio.load(responseUk, {decodeEntities: false});
        
        
        let offerTypeEn = $en('.views-birzha').html().toLowerCase().search('buy') >= 0 ? 'buy' : 'sell';
        let offerTypeUk = $uk('.views-birzha').html().toLowerCase().search('куплю') >= 0 ? 'куплю' : 'продам';
        // let linkToBuyerSeller = $('.Main-singleContent');
        let scriptEn = parseScript($en('.Main-singleContent > script:nth-child(1)').contents()[0].data);//company info link
        let scriptUk = parseScript($uk('.Main-singleContent > script:nth-child(1)').contents()[0].data);//company info link



        let cultureEn = $en('.item_deteils_ > div:nth-child(1) > div:nth-child(1) > b:nth-child(1)').text().trim();
        let volumeEn = $en('.item_deteils_ > div:nth-child(1) > div:nth-child(2) > b:nth-child(1)').text().trim();
        let priceEn = $en('.item_deteils_ > div:nth-child(1) > div:nth-child(3) > b:nth-child(1)').text().trim();
        let vatEn = $en('.item_deteils_ > div:nth-child(1) > div:nth-child(4) > b:nth-child(1)').text().trim();
        let descriptionEn = $en('.addInfoTextView > div:nth-child(2) > p:nth-child(1)').text().trim();
        let deliveryTermsEn = $en('.item_deteils_ > div:nth-child(2) > div:nth-child(1) > b:nth-child(1)').text().trim();
        let locationEn = $en('.item_deteils_ > div:nth-child(2) > div:nth-child(2) > b:nth-child(1)').text().trim();
        locationEn += $en('.item_deteils_ > div:nth-child(2) > div:nth-child(2) > b:nth-child(2)').text().trim();
        let processingCompanyEn = $en('.item_deteils_ > div:nth-child(2) > div:nth-child(3) > b:nth-child(1) > a:nth-child(1)').text().trim();
        let deliveryDueDataEn = $en('.item_deteils_ > div:nth-child(2) > div:nth-child(4) > b:nth-child(1)').text().trim();
        let monthOfDeliveryEn = $en('.item_deteils_ > div:nth-child(2) > div:nth-child(5) > b:nth-child(1)').text().trim();
        let validUntilEn = $en('.item_deteils_ > div:nth-child(2) > div:nth-child(6) > b:nth-child(1)').text().trim();
        let publishedEn = $en('.view-proposition-date').text().trim();


        let cultureUk = $uk('.item_deteils_ > div:nth-child(1) > div:nth-child(1) > b:nth-child(1)').text().trim();
        let volumeUk = $uk('.item_deteils_ > div:nth-child(1) > div:nth-child(2) > b:nth-child(1)').text().trim();
        let priceUk = $uk('.item_deteils_ > div:nth-child(1) > div:nth-child(3) > b:nth-child(1)').text().trim();
        let vatUk = $uk('.item_deteils_ > div:nth-child(1) > div:nth-child(4) > b:nth-child(1)').text().trim();
        let descriptionUk = $uk('.addInfoTextView > div:nth-child(2) > p:nth-child(1)').text().trim();
        let deliveryTermsUk = $uk('.item_deteils_ > div:nth-child(2) > div:nth-child(1) > b:nth-child(1)').text().trim();
        let locationUk = $uk('.item_deteils_ > div:nth-child(2) > div:nth-child(2) > b:nth-child(1)').text().trim();
        locationUk += $uk('.item_deteils_ > div:nth-child(2) > div:nth-child(2) > b:nth-child(2)').text().trim();
        let processingCompanyUk = $uk('.item_deteils_ > div:nth-child(2) > div:nth-child(3) > b:nth-child(1) > a:nth-child(1)').text().trim();
        let deliveryDueDataUk = $uk('.item_deteils_ > div:nth-child(2) > div:nth-child(4) > b:nth-child(1)').text().trim();
        let monthOfDeliveryUk = $uk('.item_deteils_ > div:nth-child(2) > div:nth-child(5) > b:nth-child(1)').text().trim();
        let validUntilUk = $uk('.item_deteils_ > div:nth-child(2) > div:nth-child(6) > b:nth-child(1)').text().trim();
        let publishedUk = $uk('.view-proposition-date').text().trim();



        //trader if 
        let companyLinkEn = scriptEn.statements[1].expression.arguments[0].body.statements[19].expression.arguments[1].body.statements[0].expression.expression.value
        let companyLinkUk = scriptUk.statements[1].expression.arguments[0].body.statements[19].expression.arguments[1].body.statements[0].expression.expression.value
        
        const responseCompanyDetailsEn = await request({
            uri:  graintrade + companyLinkEn,
            headers: headers,
            gzip: true,
        });

        const responseCompanyDetailsUk = await request({
            uri:  graintrade + companyLinkUk,
            headers: headers,
            gzip: true,
        });

        let $companyEn = cheerio.load(responseCompanyDetailsEn);
        let $companyUk = cheerio.load(responseCompanyDetailsUk);

        let companyNameEn = $companyEn('.LastDeals > tbody:nth-child(1) > tr:nth-child(1) > td:nth-child(2) > label:nth-child(1) > b:nth-child(1)').text().trim();
        let companyAddressEn = $companyEn('.LastDeals > tbody:nth-child(1) > tr:nth-child(2) > td:nth-child(2) > label:nth-child(1) > b:nth-child(1)').text().trim();
        let companyContactEn = $companyEn('.LastDeals > tbody:nth-child(1) > tr:nth-child(3) > td:nth-child(2) > label:nth-child(1) > b:nth-child(1)').text().trim();
        let companyTelephoneEn = $companyEn('.LastDeals > tbody:nth-child(1) > tr:nth-child(4) > td:nth-child(2) > label:nth-child(1) > b:nth-child(1)').text().trim();
        let companyWebsiteEn = $companyEn('.LastDeals > tbody:nth-child(1) > tr:nth-child(5) > td:nth-child(2) > label:nth-child(1) > b:nth-child(1) > a:nth-child(1)').text().trim();
        let companyRegisteredNoEn = $companyEn('.LastDeals > tbody:nth-child(1) > tr:nth-child(6) > td:nth-child(2) > label:nth-child(1) > b:nth-child(1)').text().trim();
        let companyDirectorEn = $companyEn('.LastDeals > tbody:nth-child(1) > tr:nth-child(7) > td:nth-child(2) > label:nth-child(1) > b:nth-child(1)').text().trim();
        let companyOwnerEn = $companyEn('.LastDeals > tbody:nth-child(1) > tr:nth-child(8) > td:nth-child(2) > label:nth-child(1) > b:nth-child(1)').text().trim();
        let companyTypeEn = $companyEn('.LastDeals > tbody:nth-child(1) > tr:nth-child(9) > td:nth-child(2) > label:nth-child(1) > b:nth-child(1)').text().trim();
        


        let companyNameUk = $companyUk('.LastDeals > tbody:nth-child(1) > tr:nth-child(1) > td:nth-child(2) > label:nth-child(1) > b:nth-child(1)').text().trim();
        let companyAddressUk = $companyUk('.LastDeals > tbody:nth-child(1) > tr:nth-child(2) > td:nth-child(2) > label:nth-child(1) > b:nth-child(1)').text().trim();
        let companyContactUk = $companyUk('.LastDeals > tbody:nth-child(1) > tr:nth-child(3) > td:nth-child(2) > label:nth-child(1) > b:nth-child(1)').text().trim();
        let companyTelephoneUk = $companyUk('.LastDeals > tbody:nth-child(1) > tr:nth-child(4) > td:nth-child(2) > label:nth-child(1) > b:nth-child(1)').text().trim();
        let companyWebsiteUk = $companyUk('.LastDeals > tbody:nth-child(1) > tr:nth-child(5) > td:nth-child(2) > label:nth-child(1) > b:nth-child(1) > a:nth-child(1)').text().trim();
        let companyRegisteredNoUk = $companyUk('.LastDeals > tbody:nth-child(1) > tr:nth-child(6) > td:nth-child(2) > label:nth-child(1) > b:nth-child(1)').text().trim();
        let companyDirectorUk = $companyUk('.LastDeals > tbody:nth-child(1) > tr:nth-child(7) > td:nth-child(2) > label:nth-child(1) > b:nth-child(1)').text().trim();
        let companyOwnerUk = $companyUk('.LastDeals > tbody:nth-child(1) > tr:nth-child(8) > td:nth-child(2) > label:nth-child(1) > b:nth-child(1)').text().trim();
        let companyTypeUk = $companyUk('.LastDeals > tbody:nth-child(1) > tr:nth-child(9) > td:nth-child(2) > label:nth-child(1) > b:nth-child(1)').text().trim();


        let scrappedData = {
            companyNameUk,
            companyAddressUk,
            companyContactUk,
            companyTelephoneUk,
            companyWebsiteUk,
            companyRegisteredNoUk,
            companyDirectorUk,
            companyOwnerUk,
            companyTypeUk,
            publishedUk,

            companyNameEn,
            companyAddressEn,
            companyContactEn,
            companyTelephoneEn,
            companyWebsiteEn,
            companyRegisteredNoEn,
            companyDirectorEn,
            companyOwnerEn,
            companyTypeEn,
            publishedEn,

            cultureEn,
            volumeEn,
            priceEn,
            vatEn,
            descriptionEn,
            deliveryTermsEn,
            locationEn,
            processingCompanyEn,
            deliveryDueDataEn,
            monthOfDeliveryEn,
            validUntilEn,

            cultureUk,
            volumeUk,
            priceUk,
            vatUk,
            descriptionUk,
            deliveryTermsUk,
            locationUk,
            processingCompanyUk,
            deliveryDueDataUk,
            monthOfDeliveryUk,
            validUntilUk,

            offerTypeEn,

            offerTypeUk,
        }


        await ScrappedDataModel.create({scrapped_data: scrappedData, created_at: new Date(), updated_at: new Date()});
        
        // console.log(culture, volume, price, vat, description, deliveryTerms, location, processingCompany);

        debugger;
    }

})();