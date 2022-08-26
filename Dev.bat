@findstr/v "^@f.*&" "%~f0"|powershell -&goto:eof
docker pull wolf0110/website
docker run -d -p 80:80 -v "$($pwd.ToString()+"\web"):/var/www/html" --name bom-checker-dev -e TZ=Europe/Budapest wolf0110/website