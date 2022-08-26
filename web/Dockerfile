FROM wolf0110/website
LABEL maintainer="walter20020110@gmail.com"
LABEL project="BOM-Checker"
#apache root dir
ENV WEB=/var/www/html 
ENV TZ=Europe/Budapest
#to download reports
COPY . $WEB
RUN chmod -R 777 $WEB 
