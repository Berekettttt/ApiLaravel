import logo from './logo.svg';
import './App.css';
import CreateItem from './components/CreateItem';
import EditItem from './components/EditItem';
import ShowItem from './components/ShowItem'; 
import { BrowserRouter, Routes, Route } from 'react-router-dom';

function App() {
  return (
    <div className="App">
      <BrowserRouter>
        <Routes>
          <Route path='/' element={<ShowItem />} />
          <Route path='/create' element={<CreateItem />} />
          <Route path='/edit/:id' element={<EditItem />} />
        </Routes>
      </BrowserRouter>
    </div>
  );
}

export default App;
