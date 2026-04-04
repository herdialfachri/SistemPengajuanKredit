// Sidebar.jsx
import React from "react";
import { useNavigate, useLocation } from "react-router-dom";
import {
    IconDashboard,
    IconReports,
    IconSettings,
    IconLogout,
    IconUsers,
} from "./Icons";

export default function Sidebar({ activeMenu, setActiveMenu, handleLogout }) {
    const navigate = useNavigate();
    const location = useLocation();

    // ambil data user dari localStorage
    const user = JSON.parse(localStorage.getItem("user"));
    const role = user?.role; // misalnya "nasabah", "admin", "pimpinan"

    const menus = [
        {
            key: "users",
            name: "Admin",
            path: "/admin",
            icon: <IconUsers />,
            roles: ["admin"],
        },
        {
            key: "marketing-dashboard",
            name: "Marketing",
            path: "/marketing",
            icon: <IconUsers />,
            roles: ["marketing"],
        },
        {
            key: "dashboard",
            name: "Dashboard",
            path: "/",
            icon: <IconDashboard />,
            roles: ["nasabah"],
        },
        {
            key: "pengajuan",
            name: "Pengajuan",
            path: "/pengajuan",
            icon: <IconReports />,
            roles: ["nasabah"],
        },
        {
            key: "pengaturan",
            name: "Pengaturan",
            path: "/settings",
            icon: <IconSettings />,
            roles: ["nasabah", "marketing", "pimpinan", "admin"],
        },
    ];

    // filter menu sesuai role
    const filteredMenus = menus.filter((item) => item.roles.includes(role));

    return (
        <aside className="sidebar">
            <div className="sidebar-header">
                <div className="logo-icon">BS</div>
                <h2 className="logo-text">BPR Supra</h2>
            </div>

            <nav className="sidebar-nav">
                <ul>
                    {filteredMenus.map((item) => (
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
