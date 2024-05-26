import { useEffect, useState } from 'react';
import { axiosClient } from '../../../config/Api/AxiosClient';
import { useNavigate, useParams } from 'react-router-dom';
import Swal from 'sweetalert2';

const QuestionValidation = () => {

  const { id } = useParams();
  const [question, setQuestion] = useState({});
  const navigateTo = useNavigate();
  const [errors, setErrors] = useState({});

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
    LEntêteestrespecté: false,
    Lafilièreestmentionnéeetcorrecte: false,
    Legroupeestmentionné: false,
    Laduréeestmentionnée: false,
    Lintitulédumoduleestmentionéetcorrecte: false,
    lebarèmeestmentionné: false,
    Lepreuverépondauxobjectifsdumodule: false,
    Laduréedelépreuveestsuffisante: false,
    Lasommationdubarèmeestcorrecte: false,
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
      Swal.fire({
        text: data.message,
        icon: "success",
      })
      navigateTo("/validator/questionsValidated", { replace: true });
    } catch (error) {
      setErrors(error.response.data);
    }
  };

  return (
    <form onSubmit={validateQuestion} className="container mt-5 justify-content-center">
      <h2 className="text-center">Évaluation de l&apos;examen: {question?.file_name}</h2>
      <hr />
      <h3 className='text-center'>En-tête de l&apos;épreuvee</h3>
      <div className="form-check m-auto" style={{ width: 'fit-content' }}>
        <label className='form-check-label'>
          <input
            className='form-check-input'
            type="checkbox"
            name="LEntêteestrespecté"
            checked={criteria.LEntêteestrespecté}
            onChange={handleChange}
          />
          L&apos;En-tête est respecté
        </label>
      </div>
      <div className="form-check m-auto" style={{ width: 'fit-content' }}>
        <label className='form-check-label'>
          <input
            className='form-check-input'
            type="checkbox"
            name="Lafilièreestmentionnéeetcorrecte"
            checked={criteria.Lafilièreestmentionnéeetcorrecte}
            onChange={handleChange}
          />
          La filière est mentionnée et correcte
        </label>
      </div>
      <div className="form-check m-auto" style={{ width: 'fit-content' }}>
        <label className='form-check-label'>
          <input
            className='form-check-input'
            type="checkbox"
            name="Legroupeestmentionné"
            checked={criteria.Legroupeestmentionné}
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
            name="Laduréeestmentionnée"
            checked={criteria.Laduréeestmentionnée}
            onChange={handleChange}
          />
          La durée est mentionnée
        </label>
      </div>
      <div className="form-check m-auto" style={{ width: 'fit-content' }}>
        <label className='form-check-label'>
          <input
            className='form-check-input'
            type="checkbox"
            name="Lintitulédumoduleestmentionéetcorrecte"
            checked={criteria.Lintitulédumoduleestmentionéetcorrecte}
            onChange={handleChange}
          />
          L&apos;intitulé du module est mentioné et correcte
        </label>
      </div>
      <div className="form-check m-auto" style={{ width: 'fit-content' }}>
        <label className='form-check-label'>
          <input
            className='form-check-input'
            type="checkbox"
            name="lebarèmeestmentionné"
            checked={criteria.lebarèmeestmentionné}
            onChange={handleChange}
          />
          Le barème est mentionné
        </label>
      </div>
      <h3 className='text-center'>Corp de l&apos;épreuve</h3>
      <div className="form-check m-auto" style={{ width: 'fit-content' }}>
        <label className='form-check-label'>
          <input
            className='form-check-input'
            type="checkbox"
            name="Lepreuverépondauxobjectifsdumodule"
            checked={criteria.Lepreuverépondauxobjectifsdumodule}
            onChange={handleChange}
          />
          L&apos;epreuve répond aux objectifs du module
        </label>
      </div>
      <div className="form-check m-auto" style={{ width: 'fit-content' }}>
        <label className='form-check-label'>
          <input
            className='form-check-input'
            type="checkbox"
            name="Laduréedelépreuveestsuffisante"
            checked={criteria.Laduréedelépreuveestsuffisante}
            onChange={handleChange}
          />
          La durée de l&apos;épreuve est suffisante
        </label>
      </div>
      <div className="form-check m-auto" style={{ width: 'fit-content' }}>
        <label className='form-check-label'>
          <input
            className='form-check-input'
            type="checkbox"
            name="Lasommationdubarèmeestcorrecte"
            checked={criteria.Lasommationdubarèmeestcorrecte}
            onChange={handleChange}
          />
          La sommation du barème est correcte
        </label>
      </div>
      <textarea placeholder='Commentaire' className='form-control mt-5 m-auto w-50' name='commentaire'></textarea>
      <div className='text text-danger text-center m-auto'>{errors?.commentaire}</div>
      <div className="text-center mt-5">
        <button type="submit" className='btn btn-primary'>Soumettre</button>
      </div>
    </form>
  );
};

export default QuestionValidation;
