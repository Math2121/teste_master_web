import axios from 'axios'

const httpClient = axios.create({
  baseURL: 'http://localhost:80/api/',
  timeout: 10000, // indicates, 10000ms ie. 10 second
  body: {
    'Content-Type': 'application/json',
    'Accept': 'application/json'
  }
})

export default httpClient