import * as constants from '../constants';

export const registerUser = () => ({
    type: constants.API,
    payload:{
        method:'POST',
        url:'/api/user/registration',
        data,
        success: (response)=>(setUserInfo(response)),
        postProcessSuccess: onSuccess,
        postProcessError: onError
    }
})

const setUserInfo = (data) => {
    const parseToken = JSON.parse(atob.data.access_token.split('.')[1]);
    const userInfo = {
        ID: parseToken.id,
        email:parseToken.email,
        token:data.access_token,
        isLogin:true
    };

    localStorage.setItem('USER_INFO',userInfo);
    return {type:constants.SET_USER_INFO,payload:userInfo}
}

// {
//     "message": "user Stored Successfully",
//     "data": {
//         "name": "test1",
//         "email": "test@gmail.com",
//         "updated_at": "2021-07-03T15:42:24.000000Z",
//         "created_at": "2021-07-03T15:42:24.000000Z",
//         "id": 2
//     },
//     "validation": true,
//     "type": "store"
// }

// {
//     "message": "somthing went wrong",
//     "data": {
//         "email": {
//             "0": "The email has already been taken."
//         }
//     },
//     "validation": false,
//     "type": "store"
// }

// {
//     "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9yZWFjdGNvbnRhY3RhcHAudGVzdFwvYXBpXC91c2VyXC9zaWduLXVwIiwiaWF0IjoxNjI1MzI5ODQ5LCJleHAiOjE2MjUzMzM0NDksIm5iZiI6MTYyNTMyOTg0OSwianRpIjoiZ2tHVWlRNnkzdndWSjdPayIsInN1YiI6NSwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.Mbc09hmyxY1iCo5Azej30NHCHYbTZ7gAmty08bt2cD8",
//     "token_type": "bearer",
//     "expires_in": 3600
// }
