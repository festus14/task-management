import React from 'react';
import Button from '@material-ui/core/Button';
import MiniDrawer from './drawer/drawer';
import Commenthold from './commenthold';


function App() {
  return (
    <div className="App">
     <MiniDrawer />
     <Commenthold />
    </div>
  );
}

export default App;
