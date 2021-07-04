import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter } from 'react-router-dom';
import Note from './Note';

import { Provider } from 'react-redux';
import configurStore from './redux/configurStore';



store = configurStore();
function NoteApp() {
    return (
        <Provider store={store}>
            <BrowserRouter>
                <Note />
            </BrowserRouter>
        </Provider>
    );
}

export default NoteApp;

if (document.getElementById('app')) {
    ReactDOM.render(
    <NoteApp />
    ,document.getElementById('app'));
}
