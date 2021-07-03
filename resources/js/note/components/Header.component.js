import React from 'react';

const Header = () => (
    <nav className="navbar navbar-dark bg-dark">
        <div className="container">
            <div className="navbar-brand">
                <div className="d-flex align-items-center">
                    <i className="fas fa-book fa-1x"></i>
                    <h4 className="pl-3" style={{marginTop:'10px'}}>
                        Note taking
                    </h4>
                </div>
            </div>
        </div>
    </nav>
);

export default Header;
