
// Put your backend url here
const API_URL = import.meta.env.API_URL

const $api = axios.create({
    withCredentials: true,
    baseURL: API_URL
})
const $authApi = axios.create({
    withCredentials: true,
    baseURL: API_URL
})

$authApi.interceptors.request.use((config) => {
    config.headers.Authorization = `Bearer ${localStorage.getItem('token')}`
    return config;
})
$api.interceptors.request.use((config) => {
    return config;
})


export {$api,$authApi} ;