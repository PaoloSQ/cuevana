function FetchRequest(url, method, data = []) {
    let options = {
        method: method,
        headers: {
            'Content-Type': 'application/json',
        },
    };

    if (method.toUpperCase() === 'POST') {
        options.body = JSON.stringify(data);
    }

    return fetch(url, options)
        .then(function (response) {
            if (!response.ok) {
                throw new Error('Hubo un error en la conexión');
            }
            return response.json();
        })
        .then(function (data) {
            return data;
        })
        .catch(function (error) {
            console.error('Error en la solicitud:', error);
            throw error; 
        });
}
