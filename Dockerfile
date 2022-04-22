FROM ubuntu/apache2
LABEL maintainer="walter20020110@gmail.com"

#apache root dir
ENV WEB=/var/www/html
ENV TZ=Europe/Budapest
#proxy for SE
ENV http_proxy=http://165.225.200.15:80
ENV https_proxy=http://165.225.200.15:80

#update
RUN apt update && apt upgrade -y
RUN apt install php php-mysqli -y

#add my own files
COPY . $WEB

#to use good database
ENV DEPLOYED=yes

#backup default apache
RUN mv $WEB/index.html $WEB/apache.html