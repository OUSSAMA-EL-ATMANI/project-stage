import { useEffect, useState } from "react";
import { axiosClient } from "../../../config/Api/AxiosClient";

const AddQuestions = () => {

  const [questions, setQuestions] = useState([]);

  const downloadQuestion = async (question) => {
    try {
      const res = await axiosClient.get(`/designer/download-questions/${question.id}`, {
        responseType: 'blob',
      });
      const url = window.URL.createObjectURL(new Blob([res.data]));
      const link = document.createElement('a');
      link.href = url;
      const pdfName = 'Exam_' + question?.file_name + '.pdf';
      link.setAttribute('download', pdfName);
      document.body.appendChild(link);
      link.click();
      window.URL.revokeObjectURL(url);
    } catch (error) {
      console.error(error);
    }
  }

  const getQuestions = async () => {
    try {
      const { data } = await axiosClient.get("/designer/get-questions");
      setQuestions(data);
    } catch (error) {
      console.log(error);
    }
  };

  useEffect(() => {
    getQuestions();
  }, []);

  return (
    <div className="row g-3 w-50 m-auto">
      <table className="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Question</th>
            <th scope="col">Description</th>
            <th scope="col">Filiere</th>
            <th scope="col">Status</th>
            <th scope="col">Points</th>
            <th scope="col">Télécharger</th>
            <th scope="col">Commentaire</th>
          </tr>
        </thead>
        <tbody>
          {questions.map((question, index) => (
            <tr key={index}>
              <th scope="row">{index + 1}</th>
              <td>{question.file_name}</td>
              <td>{question.description}</td>
              <td>{question.filiere.nom}</td>
              <td>{question.is_visible ? question.is_accepted ? <span style={{ color: "green", fontWeight: 'bold' }}>Accepte</span> : <span style={{ color: "red", fontWeight: 'bold' }}>Refuse</span> : <span style={{ color: "orange", fontWeight: 'bold' }}>En cours</span>}</td>
              <td>{question.points}</td>
              <td><button className="btn btn-primary" onClick={() => downloadQuestion(question)}>Télécharger</button></td>
              <td>{question.commentaire}</td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  )
}

export default AddQuestions
