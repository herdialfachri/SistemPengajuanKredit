import React from "react";
import { useNavigate } from "react-router-dom";
import {
    IconDashboard,
    IconUsers,
    IconReports,
    IconSettings,
    IconLogout,
} from "./Icons";

export default function Sidebar({ activeMenu, setActiveMenu, handleLogout }) {
    const navigate = useNavigate();

    const menus = [
        { name: "Dashboard", path: "/", icon: <IconDashboard /> },
        { name: "Users", path: "/users", icon: <IconUsers /> },
        { name: "Reports", path: "/pengajuan", icon: <IconReports /> },
        { name: "Settings", path: "/settings", icon: <IconSettings /> },
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
                            key={item.name}
                            className={activeMenu === item.name ? "active" : ""}
                            onClick={() => {
                                setActiveMenu(item.name);
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
