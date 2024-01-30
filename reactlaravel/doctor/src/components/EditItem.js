import React, { useState,useEffect } from 'react';
import axios from 'axios';
import { useNavigate,useParams } from 'react-router-dom';
import '../App.css';

const api = 'http://localhost:8000/api/item';

const EditItem = () => {

  const [DoctorName, setname]= useState("")
const [PhoneNumber, setphonenumber]= useState("")
const [Specialty, setspecialty]= useState("")
const [RoomNumber, setroomnumber]= useState("")
const navigate = useNavigate()
const {id} =useParams()

const update = async(e) => {
  e.preventDefault()
  await axios.put(`${api}/${id}`,{
    DoctorName: DoctorName,
    PhoneNumber: PhoneNumber,
    Specialty: Specialty,
    RoomNumber: RoomNumber
  })
  navigate("/")

}


useEffect(() => {
  const getItemById= async() => {
    const response =await axios.get(`${api}/${id}`)
    setname(response.data.DoctorName)
    setphonenumber(response.data.PhoneNumber)
    setspecialty(response.data.Specialty)
    setroomnumber(response.data.RoomNumber)
  }


  getItemById()
},[])

  return (
    <div>
        <h3 className='CreateHeader'>Doktor Güncelle</h3>
        <div className="Kutu">
          <form onSubmit={update}>
            <div className="mb-3">
            <input value={DoctorName} onChange={(e) => setname(e.target.value)} type="text" className="form-control" placeholder="Doctor Name"/>
            </div>
            <div className="mb-3">
            <input value={PhoneNumber} onChange={(e) => setphonenumber(e.target.value)} type="text" className="form-control" placeholder="Phone Number" />
            </div>
            <div className="mb-3">
            <input value={Specialty} onChange={(e) => setspecialty(e.target.value)} type="text" className="form-control" placeholder="Specialty"/>
            </div>
            <div className="mb-3">
            <input value={RoomNumber} onChange={(e) => setroomnumber(e.target.value)} type="text" className="form-control" placeholder="Room Number"/>
            </div>
            <button type="submit" className="btn btn-primary">
              Güncelle
            </button>
          </form>
        </div>
      </div>
  );
};

export default EditItem;