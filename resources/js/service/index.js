import axios from 'axios'

const accessToken = localStorage.getItem('auth_token');

console.log(accessToken,4444)
const $http = axios.create({
    baseURL: import.meta.env.VITE_API_URL,
    headers: {
        'Authorization': accessToken ? `Bearer ${accessToken}` : '',
        'Accept-Language': 'ja',
    },
});
$http.interceptors.response.use((response) => response, (error) => {
    if(window.location.pathname !== '/login' && error.response.status === 401) {
        window.location.href = '/login'
    }
    if(error.response.status === 419) {
        window.location.reload()
    }
    if(error.response.status === 403) {
        window.location.href = '/'
    }
    return Promise.reject(error)
})



export default $http


/*
* Cancel request
const controller = new AbortController();

axios.get('/foo/bar', {
   signal: controller.signal
}).then(function(response) {
   //...
});
// cancel the request
controller.abort()*/
