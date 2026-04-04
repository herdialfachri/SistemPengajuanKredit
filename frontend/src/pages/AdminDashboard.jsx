import React, { useState } from "react";
import { useNavigate } from "react-router-dom";
import "../assets/css/dashboard.css"; // Pastikan path CSS sesuai
import api from "../api";

import {
  IconDashboard,
  IconUsers,
  IconReports,
  IconSettings,
  IconLogout,
  IconSearch,
  IconBell,
  IconDollar,
  IconBox,
  IconClock
} from "../components/Icons";

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