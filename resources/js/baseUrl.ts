const BASE_URL = document.location.host === "cc.maergroup.ru" ? document.location.protocol + "//" + document.location.host + "/comod" : (document.location.host === "dev.comod.maergroup.ru" ? document.location.protocol + "//" + document.location.host : `http://${process.env.HOST}:8000`);
const IMG_URL_START = `${BASE_URL}/storage`;

export {
    BASE_URL,
    IMG_URL_START
};
