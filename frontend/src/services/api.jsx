const API_URL = '/api/v1';

export const TestService = {
    getTest: () => 
        fetch(`${API_URL}/test`)
            .then(res => res.json())
            .catch(error => ({ error: error.message }))
};
