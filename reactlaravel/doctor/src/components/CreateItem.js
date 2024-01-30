import React, { useState } from 'react';
import axios from 'axios';
import { useNavigate } from 'react-router-dom';
import '../App.css';


const api = 'http://localhost:8000/api/item';


const CreateItem = () => {

const [DoctorName, setname]= useState("")
const [PhoneNumber, setphonenumber]= useState("")
const [Specialty, setspecialty]= useState("")
const [RoomNumber, setroomnumber]= useState("")
const navigate = useNavigate()

const post= async(e) => {
  e.preventDefault()
  await axios.post(api,{
    DoctorName: DoctorName,
    PhoneNumber: PhoneNumber,
    Specialty: Specialty,
    RoomNumber: RoomNumber
  })
  navigate("/")
}
 return (
      <div>
        <h3 className='CreateHeader'>Doktor Ekle</h3>
        <div className="Kutu">
          <form onSubmit={post}>
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
              Kaydet
            </button>
          </form>
        </div>
      </div>
    );
  };

export default CreateItem;