import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter } from 'react-router-dom';
import Note from './Note';


function NoteApp() {
    return (
        <BrowserRouter>
            <Note />
        </BrowserRouter>
    );
}

export default NoteApp;

if (document.getElementById('app')) {
    ReactDOM.render(
    <NoteApp />
    ,document.getElementById('app'));
}
