import React, { useState, useEffect } from 'react';
import axios from 'axios';
import { Link } from 'react-router-dom';

const api = 'http://localhost:8000/api';

const ShowItem = () => {
  const [items, setItems] = useState([]);

  useEffect(() => {
    getAllItems();
  }, []);

  const getAllItems = async () => {
    const response = await axios.get(`${api}/items`);
    setItems(response.data);
  };

  const deleteItem = async (id) => {
    await axios.post(`${api}/itemdelete/${id}`);
    getAllItems()
  }

  return (
    <div>
      <div>
        <Link to="/create" className="btn btn-success text-white mb-2 mt-2">
          Create
        </Link>
      </div>
      <table className="table table-striped">
        <thead className="bg-success text-white">
          <tr>
            <th>Doctor Name</th>
            <th>Phone Number</th>
            <th>Specialty</th>
            <th>Room Number</th>
          </tr>
        </thead>
        <tbody>
          {items.map((item) => (
            <tr key={item.id}>
              <td>{item.DoctorName}</td>
              <td>{item.PhoneNumber}</td>
              <td>{item.Specialty}</td>
              <td>{item.RoomNumber}</td>
              <td>
                <Link to={`/edit/${item.id}`} className="btn btn-warning">Edit</Link>
                <button onClick={() => deleteItem(item.id)} className="btn btn-danger">Delete</button>
              </td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  );
};

export default ShowItem;