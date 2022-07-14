FROM wolf0110/website
LABEL maintainer="walter20020110@gmail.com"
#apache root dir
ENV WEB=/var/www/html 
ENV TZ=Europe/Budapest
#add my own files
COPY . $WEB
#to use the correct database
ENV DEPLOYED=yes
#backup default apache
RUN mv $WEB/index.html $WEB/apache.html