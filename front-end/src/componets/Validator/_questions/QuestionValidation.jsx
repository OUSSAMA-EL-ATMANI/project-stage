import { useEffect, useState } from 'react';
import { axiosClient } from '../../../config/Api/AxiosClient';
import { useNavigate, useParams } from 'react-router-dom';

const QuestionValidation = () => {

  const { id } = useParams();
  const [question, setQuestion] = useState({});
  const navigateTo = useNavigate();

  const getQuestion = async () => {
    try {
      const { data } = await axiosClient.get(`/validator/questions/${id}`);
      setQuestion(data);
    } catch (error) {
      console.log(error);
    }
  };

  useEffect(() => {
    getQuestion();
  }, []);

  const [criteria, setCriteria] = useState({
    clartéDesInstructions: false,
    policeEtMiseEnPage: false,
    pertinenceContenuCours: false,
    variétéDesQuestions: false,
    niveauDeDifficulté: false,
    équité: false,
    organisationLogique: false,
    adéquationDuTemps: false,
    couvertureObjectifsApprentissage: false,
    grilleDeNotationClaire: false,
  });

  const handleChange = (event) => {
    const { name, checked } = event.target;
    setCriteria((prevCriteria) => ({
      ...prevCriteria,
      [name]: checked,
    }));
  };

  const validateQuestion = async (e) => {
    e.preventDefault();
    let totalPoints = 0;
    Object.values(criteria).forEach((isChecked) => {
      if (isChecked) {
        totalPoints += 10;
      }
    });
    const commentaire = e.target.commentaire.value;

    try {
      const { data } = await axiosClient.put(`/validator/validateQuestion/${id}`, { questions_id: id, points: totalPoints, commentaire });
      navigateTo("/validator/questionsValidated", { replace: true });
    } catch (error) {
      alert(error.response.data.message);
      console.log(error);
    }
  };

  return (
    <form onSubmit={validateQuestion} className="container mt-5 justify-content-center">
      <h2 className="text-center">Évaluation de l'examen: {question?.file_name}</h2>
      <div className="form-check m-auto" style={{ width: 'fit-content' }}>
        <label className='form-check-label'>
          <input
            className='form-check-input'
            type="checkbox"
            name="clartéDesInstructions"
            checked={criteria.clartéDesInstructions}
            onChange={handleChange}
          />
          Clarté des Instructions
        </label>
      </div>
      <div className="form-check m-auto" style={{ width: 'fit-content' }}>
        <label className='form-check-label'>
          <input
            className='form-check-input'
            type="checkbox"
            name="policeEtMiseEnPage"
            checked={criteria.policeEtMiseEnPage}
            onChange={handleChange}
          />
          Police et Mise en Page
        </label>
      </div>
      <div className="form-check m-auto" style={{ width: 'fit-content' }}>
        <label className='form-check-label'>
          <input
            className='form-check-input'
            type="checkbox"
            name="pertinenceContenuCours"
            checked={criteria.pertinenceContenuCours}
            onChange={handleChange}
          />
          Pertinence par Rapport au Contenu du Cours
        </label>
      </div>
      <div className="form-check m-auto" style={{ width: 'fit-content' }}>
        <label className='form-check-label'>
          <input
            className='form-check-input'
            type="checkbox"
            name="variétéDesQuestions"
            checked={criteria.variétéDesQuestions}
            onChange={handleChange}
          />
          Variété des Questions
        </label>
      </div>
      <div className="form-check m-auto" style={{ width: 'fit-content' }}>
        <label className='form-check-label'>
          <input
            className='form-check-input'
            type="checkbox"
            name="niveauDeDifficulté"
            checked={criteria.niveauDeDifficulté}
            onChange={handleChange}
          />
          Niveau de Difficulté
        </label>
      </div>
      <div className="form-check m-auto" style={{ width: 'fit-content' }}>
        <label className='form-check-label'>
          <input
            className='form-check-input'
            type="checkbox"
            name="équité"
            checked={criteria.équité}
            onChange={handleChange}
          />
          Équité
        </label>
      </div>
      <div className="form-check m-auto" style={{ width: 'fit-content' }}>
        <label className='form-check-label'>
          <input
            className='form-check-input'
            type="checkbox"
            name="organisationLogique"
            checked={criteria.organisationLogique}
            onChange={handleChange}
          />
          Organisation Logique
        </label>
      </div>
      <div className="form-check m-auto" style={{ width: 'fit-content' }}>
        <label className='form-check-label'>
          <input
            className='form-check-input'
            type="checkbox"
            name="adéquationDuTemps"
            checked={criteria.adéquationDuTemps}
            onChange={handleChange}
          />
          Adéquation du Temps
        </label>
      </div>
      <div className="form-check m-auto" style={{ width: 'fit-content' }}>
        <label className='form-check-label'>
          <input
            className='form-check-input'
            type="checkbox"
            name="couvertureObjectifsApprentissage"
            checked={criteria.couvertureObjectifsApprentissage}
            onChange={handleChange}
          />
          Couverture des Objectifs d'Apprentissage
        </label>
      </div>
      <div className="form-check m-auto" style={{ width: 'fit-content' }}>
        <label className='form-check-label'>
          <input
            className='form-check-input'
            type="checkbox"
            name="grilleDeNotationClaire"
            checked={criteria.grilleDeNotationClaire}
            onChange={handleChange}
          />
          Grille de Notation Claire
        </label>
      </div>
      <textarea placeholder='Commentaire' className='form-control mt-5 m-auto w-50' name='commentaire'>
      </textarea>
      <div className="text-center mt-5">
        <button type="submit" className='btn btn-primary'>Soumettre</button>
      </div>
    </form>
  );
};

export default QuestionValidation;
