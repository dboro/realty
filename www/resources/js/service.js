const url = '/api/realty-items'

export async function fetchItems(page, filters = '') {
    filters = filters ? '&' + filters : ''
    const response = await axios.get(`${url}?page=${page}${filters}`)
    return response.data.data
}

export async function getCount(filters = '') {
    filters = filters ? '?' + filters : ''
    const response = await axios.get(`${url}/count${filters}`)
    return response.data.data
}

export async function getFilters(filters = '') {
    filters = filters ? '?' + filters : ''
    const response = await axios.get(`${url}/filters${filters}`)
    return response.data.data
}
