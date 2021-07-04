import * as constants from '../constants';

export const registerUser = (data,onSuccess,onError) => ({
    type: constants.API,
    payload:{
        method:'POST',
        url:'/api/user/sign-up',
        data,
        success: (response) => (
            setUserInfo(response)
        ),
        postProcessSuccess: onSuccess,
        postProcessError: onError
    }
})

const setUserInfo = (data) => {

    const parseToken = JSON.parse(atob(data.access_token.split('.')[1]));
    const userInfo = {
        ID: parseToken.jti,
        token:data.access_token,
        isLogin:true
    };

    localStorage.setItem('USER_INFO',userInfo);
    return {type:constants.SET_USER_INFO,payload:userInfo}
}
