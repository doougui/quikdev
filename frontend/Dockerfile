FROM node:lts-alpine

# make the 'app' folder the current working directory
WORKDIR /app

# copy both 'package.json' and 'package-lock.json' (if available)
COPY package*.json ./

# install project dependencies
RUN npm install

# export 8080 port
EXPOSE 8080

# serve application
CMD [ "npm", "run", "serve" ]