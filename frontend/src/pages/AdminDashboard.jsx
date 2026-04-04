import React, { useState } from "react";
import { useNavigate } from "react-router-dom";
import "../assets/css/dashboard.css"; // Pastikan path CSS sesuai
import api from "../api";

export default function AdminDashboard() {
  const navigate = useNavigate();
  const [activeMenu, setActiveMenu] = useState("Dashboard");

const handleLogout = async () => {
  const token = localStorage.getItem("token");

  try {
    // panggil API logout ke backend
    await api.post("/logout", {}, {
      headers: { Authorization: `Bearer ${token}` }
    });

    console.log("Logout berhasil di server");
  } catch (err) {
    console.error("Logout error:", err);
  }

  // hapus token di localStorage
  localStorage.removeItem("token");

  // redirect ke login
  navigate("/login");
};

  // Data dummy untuk statistik
  const stats = [
    { title: "Total Users", value: "1,240", change: "+12%", icon: "users" },
    { title: "Revenue", value: "$45,200", change: "+8%", icon: "dollar" },
    { title: "New Orders", value: "340", change: "+5%", icon: "orders" },
    { title: "Pending", value: "15", change: "-2%", icon: "pending" },
  ];

  // Data dummy untuk tabel
  const recentActivities = [
    { id: 1, user: "Ahmad Subarkah", action: "Login Sistem", time: "2 menit lalu", status: "Success" },
    { id: 2, user: "Siti Nurhaliza", action: "Update Profil", time: "15 menit lalu", status: "Pending" },
    { id: 3, user: "Budi Santoso", action: "Transaksi Gagal", time: "1 jam lalu", status: "Failed" },
    { id: 4, user: "Dewi Lestari", action: "Login Sistem", time: "2 jam lalu", status: "Success" },
  ];

  return (
    <div className="dashboard-container">
      {/* Sidebar */}
      <aside className="sidebar">
        <div className="sidebar-header">
          <div className="logo-icon">MP</div>
          <h2 className="logo-text">AdminPanel</h2>
        </div>
        
<nav className="sidebar-nav">
  <ul>
    {['Dashboard', 'Users', 'Reports', 'Settings'].map((item) => (
      <li 
        key={item}
        className={activeMenu === item ? 'active' : ''}
        onClick={() => {
          setActiveMenu(item);
          if (item === "Reports") {
            navigate("/pengajuan"); // arahkan ke form pengajuan
          }
          if (item === "Dashboard") {
            navigate("/");
          }
          if (item === "Users") {
            navigate("/users"); // kalau nanti ada halaman users
          }
          if (item === "Settings") {
            navigate("/settings"); // kalau nanti ada halaman settings
          }
        }}
      >
        <span className="nav-icon">
          {item === 'Dashboard' && <IconDashboard />}
          {item === 'Users' && <IconUsers />}
          {item === 'Reports' && <IconReports />}
          {item === 'Settings' && <IconSettings />}
        </span>
        {item}
      </li>
    ))}
  </ul>
</nav>

        <div className="sidebar-footer">
          <button onClick={handleLogout} className="logout-btn-modern">
            <IconLogout /> Keluar
          </button>
        </div>
      </aside>

      {/* Main Content */}
      <main className="main-content">
        {/* Header */}
        <header className="header">
          <div className="search-bar">
            <IconSearch />
            <input type="text" placeholder="Cari sesuatu..." />
          </div>
          
          <div className="profile-menu">
            <div className="notification-badge">
              <IconBell />
              <span className="badge">3</span>
            </div>
            <div className="avatar">
              <span>AD</span>
            </div>
            <div className="profile-info">
              <span className="profile-name">Admin Utama</span>
              <span className="profile-role">Super Admin</span>
            </div>
          </div>
        </header>

        {/* Content Area */}
        <div className="content-wrapper">
          <div className="welcome-section">
            <h1>Halo, Admin! 👋</h1>
            <p>Berikut ringkasan aktivitas sistem Anda hari ini.</p>
          </div>

          {/* Stats Grid */}
          <div className="stats-grid">
            {stats.map((stat, index) => (
              <div key={index} className="stat-card">
                <div className="stat-icon-bg">
                   {/* Render ikon berdasarkan nama */}
                   {stat.icon === 'users' && <IconUsers color="#E11D48" size={20} />}
                   {stat.icon === 'dollar' && <IconDollar color="#E11D48" size={20} />}
                   {stat.icon === 'orders' && <IconBox color="#E11D48" size={20} />}
                   {stat.icon === 'pending' && <IconClock color="#E11D48" size={20} />}
                </div>
                <div className="stat-details">
                  <span className="stat-title">{stat.title}</span>
                  <h3 className="stat-value">{stat.value}</h3>
                </div>
                <span className={`stat-change ${stat.change.includes('+') ? 'positive' : 'negative'}`}>
                  {stat.change}
                </span>
              </div>
            ))}
          </div>

          {/* Recent Activity Table */}
          <div className="table-container">
            <div className="table-header">
              <h3>Aktivitas Terbaru</h3>
              <button className="btn-view-all">Lihat Semua</button>
            </div>
            <table className="modern-table">
              <thead>
                <tr>
                  <th>Pengguna</th>
                  <th>Aksi</th>
                  <th>Waktu</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                {recentActivities.map((row) => (
                  <tr key={row.id}>
                    <td className="fw-bold">{row.user}</td>
                    <td>{row.action}</td>
                    <td className="text-muted">{row.time}</td>
                    <td>
                      <span className={`status-badge ${row.status.toLowerCase()}`}>
                        {row.status}
                      </span>
                    </td>
                  </tr>
                ))}
              </tbody>
            </table>
          </div>
        </div>
        
      </main>
    </div>
  );
}

// --- Komponen Ikon SVG Sederhana ---
const IconDashboard = () => <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>;
const IconUsers = () => <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>;
const IconReports = () => <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>;
const IconSettings = () => <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>;
const IconLogout = () => <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>;
const IconSearch = () => <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#9CA3AF" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>;
const IconBell = () => <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>;
const IconDollar = () => <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>;
const IconBox = () => <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>;
const IconClock = () => <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>;