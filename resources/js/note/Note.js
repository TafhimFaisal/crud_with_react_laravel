import React from 'react';
import { Switch, Route, Redirect } from 'react-router-dom';
import Header from './components/header.component';
import Auth from './pages/auth.page';
import CreateNote from './pages/notes/createNote.page';
import EditNote from './pages/notes/EditNote.page';
import IndexNote from './pages/notes/IndexNote.page';
import ShowNote from './pages/notes/ShowNote.page';

function Note() {
    return (
        <React.Fragment>
            <Header/>
            <div className="container">
                <Switch>
                    <Route exact path="/auth" component={Auth} />
                    <Route exact path="/notes" component={IndexNote} />
                    <Route exact path="/create-note" component={CreateNote} />
                    <Route exact path="/edit-note" component={EditNote} />
                    <Route exact path="/show-note" component={ShowNote} />
                    <Redirect to="/auth" />
                </Switch>
            </div>
        </React.Fragment>
    );
}

export default Note;

