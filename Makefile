db:
	docker run --name oildb3 -v /home/illia/PhpstormProjects/docker/mysql:/var/lib/mysql -p="33066:3306" -e MYSQL_DATABASE=scrapper -e MYSQL_ROOT_PASSWORD=my-secret-pw -d mysql:latest


init:
	npm install --global gulp-cli