import React, {useEffect, useState} from "react";
import axios from "axios";
import "./App.css";

function Headers() {
  return <h1>HELLOOO EVRYNYANNN</h1>;
}

function Main() {
  const [fullData, setFullData] = useState([])
  const [data, setData] = useState([])
  const [links, setLinks] = useState([])
  
  
  useEffect(() => {
    const fetchData = async () => {
      try {
        
        const urlParams = new URLSearchParams(window.location.search);
        const page = Number(urlParams.get('page'))
        const response = await axios.get(`http://travelapp_api.test/api/destinations?page=${page}`);
        setFullData(response.data.data);
        setData(response.data.data.data)
        setLinks(response.data.data.links)
      } catch (error) {
        console.error("Error :", error);
      }
    };

    fetchData();
  }, []);

    // console.log(fullData)

  // const items = []
  // for(let i = 1; i < data.length + 1; i++ ){
  //   items.push(i)
  // }

  return (
    <div>
      <h1>Data from API:</h1>
      <table border={1} cellPadding={5}>
        <thead>
          <tr>
            <th>no</th>
            <th>name</th>
            <th>description</th>
            <th>location</th>
          </tr>
        </thead>
        <tbody>
          {data.map((item) => (
            <tr key={item.destinationId}>
              <td>{item.destinationId}</td>
              <td>{item.destinationName}</td>
              <td>{item.description}</td>
              <td>{item.location}</td>
            </tr>
          ))}
        </tbody>
      </table>
      <div className="paginate">
            <span className="thePage" value={links.url}>First</span>
            <span className="thePage"></span>
            <span className="thePage">Next</span>
            <span className="thePage">Last</span>
      </div>
    </div>
  

  );
}

function App() {
  // const [count, setCount] = useState(0)

  return (
    <>
      <Headers />
      <Main />
      {/* <Footer /> */}
    </>
  );
}

export default App;
