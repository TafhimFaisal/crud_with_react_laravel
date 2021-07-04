import * as constants from '../constants';
const defaultState = {
    ID: null,
    email:null,
    token:null,
    isLogin:false
};

const userInfo = localStorage.getItem('USER_INFO');
const initialState = userInfo ? JSON.parse(userInfo) : defaultState;

export default function userReducer(state = initialState,action) {
    switch (action.type) {
        case constants.SET_USER_INFO:
            return {...action.payload};
            break;
        default:
            return state;
            break;
    }
}
