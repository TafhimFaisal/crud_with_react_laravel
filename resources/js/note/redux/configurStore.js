import { createStore, applyMiddleware } from "redux";
import rootReducer from "./reducers";
import { apiMiddleware } from "./middleware";

export default function configurStore(initialState) {
    return createStore(
        rootReducer,
        initialState,
        applyMiddleware(apiMiddleware)
    );
}
