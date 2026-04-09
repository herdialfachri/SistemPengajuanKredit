// import React, { useEffect, useState } from "react";
// import api from "../api";

// export default function ProfileForm() {
//     const [formData, setFormData] = useState({
//         nama: "",
//         email: "",
//         no_hp: "",
//         alamat: "",
//         pekerjaan: "",
//     });
//     const [loading, setLoading] = useState(false);

//     useEffect(() => {
//         const storedUser = localStorage.getItem("user");
//         if (storedUser) {
//             const user = JSON.parse(storedUser);
//             setFormData({
//                 nama: user.nama || "",
//                 email: user.email || "",
//                 no_hp: user.no_hp || "",
//                 alamat: user.alamat || "",
//                 pekerjaan: user.pekerjaan || "",
//             });
//         }
//     }, []);

//     const handleChange = (e) => {
//         const { name, value } = e.target;
//         setFormData((prev) => ({ ...prev, [name]: value }));
//     };

//     const handleSubmit = async (e) => {
//         e.preventDefault();
//         setLoading(true);
//         try {
//             const res = await api.put("/profile", formData, {
//                 headers: {
//                     Authorization: `Bearer ${localStorage.getItem("token")}`,
//                 },
//             });
//             alert(res.data.message);
//             localStorage.setItem("user", JSON.stringify(res.data.user));
//         } catch (err) {
//             alert(
//                 "Update gagal: " + (err.response?.data?.message || err.message),
//             );
//         } finally {
//             setLoading(false);
//         }
//     };

//     return (
//         <div className="form-card">
//             <div className="form-card-header">
//                 <h2>Update Profile</h2>
//             </div>
//             <form className="form-body" onSubmit={handleSubmit}>
//                 <div className="form-group">
//                     <label>Nama</label>
//                     <input
//                         type="text"
//                         name="nama"
//                         value={formData.nama}
//                         onChange={handleChange}
//                     />
//                 </div>
//                 <div className="form-group">
//                     <label>Email</label>
//                     <input
//                         type="email"
//                         name="email"
//                         value={formData.email}
//                         onChange={handleChange}
//                     />
//                 </div>
//                 <div className="form-group">
//                     <label>No HP</label>
//                     <input
//                         type="text"
//                         name="no_hp"
//                         value={formData.no_hp}
//                         onChange={handleChange}
//                     />
//                 </div>
//                 <div className="form-group">
//                     <label>Alamat</label>
//                     <textarea
//                         name="alamat"
//                         value={formData.alamat}
//                         onChange={handleChange}
//                     ></textarea>
//                 </div>
//                 <div className="form-group">
//                     <label>Pekerjaan</label>
//                     <input
//                         type="text"
//                         name="pekerjaan"
//                         value={formData.pekerjaan}
//                         onChange={handleChange}
//                     />
//                 </div>
//                 <div className="form-footer">
//                     <button
//                         type="submit"
//                         className="btn btn-primary"
//                         disabled={loading}
//                     >
//                         {loading ? "Menyimpan..." : "Simpan Perubahan"}
//                     </button>
//                 </div>
//             </form>
//         </div>
//     );
// }
