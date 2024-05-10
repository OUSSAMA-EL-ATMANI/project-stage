import './App.css';
import { Routes, Route } from 'react-router-dom';
import ConcepteurIndex from './layouts/Concepteur/ConcepteurIndex';
import ValidateurIndex from './layouts/Validateur/ValidateurIndex';
import GuestIndex from './layouts/Guest/GuestIndex';
import GuestHome from './componets/Guest/GuestHome';
import ConcepteurLogin from './componets/Auth/Concepteur/ConcepteurLogin';
import ValidateurLogin from './componets/Auth/Validateur/ValidateurLogin';

function App() {

  return (
    <>
      <Routes>
        <Route path='/' element={<GuestIndex />}>
          <Route index element={<GuestHome />} />
          <Route path='concepteur/login' element={<ConcepteurLogin />} />
          <Route path='validateur/login' element={<ValidateurLogin />} />
        </Route>
        <Route path='/concepteur' element={<ConcepteurIndex />}>
        </Route>
        <Route path='/validateur' element={<ValidateurIndex />}>
        </Route>
      </Routes>
    </>
  )
}

export default App
