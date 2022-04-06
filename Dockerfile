FROM ubuntu/apache2
LABEL maintainer="walter20020110@gmail.com"
#apache root dir
ENV WEB=/var/www/html
#port
EXPOSE 80 

#update
RUN apt update && apt upgrade -y
RUN apt install php -y

#add my own files
COPY . $WEB

RUN mv $WEB/index.html $WEB/apache.html