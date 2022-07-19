FROM wolf0110/website
LABEL maintainer="walter20020110@gmail.com"
#apache root dir
ENV WEB=/var/www/html 
ENV TZ=Europe/Budapest
#add my own files
COPY . $WEB
RUN chmod -R 777 $WEB
#to use the correct database
ENV DEPLOYED=yes