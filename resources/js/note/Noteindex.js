import React from 'react';
import ReactDOM from 'react-dom';

function Noteindex() {
    return (
        <div className="container">
            <h1>hello world !!</h1>
        </div>
    );
}

export default Noteindex;

if (document.getElementById('app')) {
    ReactDOM.render(<Noteindex />, document.getElementById('app'));
}
