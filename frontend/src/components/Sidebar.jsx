// Sidebar.jsx
import React from "react";
import { useNavigate, useLocation } from "react-router-dom";
import { IconDashboard, IconReports, IconSettings, IconLogout } from "./Icons";

export default function Sidebar({ activeMenu, setActiveMenu, handleLogout }) {
    const navigate = useNavigate();
    const location = useLocation(); // ambil path aktif

    const menus = [
        {
            key: "dashboard",
            name: "Dashboard",
            path: "/",
            icon: <IconDashboard />,
        },
        {
            key: "pengajuan",
            name: "Pengajuan",
            path: "/pengajuan",
            icon: <IconReports />,
        },
        {
            key: "pengaturan",
            name: "Pengaturan",
            path: "/settings",
            icon: <IconSettings />,
        },
    ];

    return (
        <aside className="sidebar">
            <div className="sidebar-header">
                <div className="logo-icon">BS</div>
                <h2 className="logo-text">BPR Supra</h2>
            </div>

            <nav className="sidebar-nav">
                <ul>
                    {menus.map((item) => (
                        <li
                            key={item.key}
                            className={
                                activeMenu === item.key ||
                                location.pathname === item.path
                                    ? "active"
                                    : ""
                            }
                            onClick={() => {
                                setActiveMenu(item.key);
                                navigate(item.path);
                            }}
                        >
                            <span className="nav-icon">{item.icon}</span>
                            {item.name}
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
    );
}
