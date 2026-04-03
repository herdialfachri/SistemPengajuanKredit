import { useEffect, useState } from "react";
import { useNavigate } from "react-router-dom";
import api from "../api";

export default function Dashboard() {
  const [users, setUsers] = useState([]);
  const navigate = useNavigate();

  useEffect(() => {
    const token = localStorage.getItem("token");
    if (!token) {
      navigate("/login"); // kalau belum login, redirect
      return;
    }

    api.get("/get-users", {
      headers: { Authorization: `Bearer ${token}` }
    })
    .then(res => setUsers(res.data))
    .catch(err => {
      console.error(err);
      if (err.response && err.response.status === 401) {
        alert("Token tidak valid, silakan login ulang");
        localStorage.removeItem("token");
        navigate("/login");
      }
    });
  }, [navigate]);

  return (
    <div>
      <h2>Daftar User</h2>
      <ul>
        {users.map(u => <li key={u.id}>{u.nama} - {u.email}</li>)}
      </ul>
    </div>
  );
}