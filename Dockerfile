FROM ubuntu/apache2

#apache root dir
ENV WEB=/var/www/html

#update
RUN apt update && apt upgrade -y
RUN apt install php -y

#add my own files
COPY . $WEB

RUN mv $WEB/index.html $WEB/apache.html