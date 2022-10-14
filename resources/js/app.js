import React from "react";
import  reactDOM  from "react-dom/client";

const App = () => <h1>Hello From React Component</h1>;

reactDOM.createRoot(document.getElementById('root')).render(<App/>);