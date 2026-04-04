import React, { useState } from "react";
import "../assets/css/dashboard.css";
import api from "../api";
import Sidebar from "../components/Sidebar";
import Header from "../components/Header";
import MarketingContent from "../components/MarketingContent";

export default function MarketingDashboard() {
    const [activeMenu, setActiveMenu] = useState("Dashboard");

    const handleLogout = async () => {
        const token = localStorage.getItem("token");
        try {
            await api.post(
                "/logout",
                {},
                { headers: { Authorization: `Bearer ${token}` } },
            );
            console.log("Logout berhasil di server");
        } catch (err) {
            console.error("Logout error:", err);
        }
        localStorage.removeItem("token");
        window.location.href = "/login";
    };

    const stats = [
        { title: "Total Users", value: "1,240", change: "+12%", icon: "users" },
        { title: "Revenue", value: "$45,200", change: "+8%", icon: "dollar" },
        { title: "New Orders", value: "340", change: "+5%", icon: "orders" },
        { title: "Pending", value: "15", change: "-2%", icon: "pending" },
    ];

    return (
        <div className="dashboard-container">
            <Sidebar
                activeMenu={activeMenu}
                setActiveMenu={setActiveMenu}
                handleLogout={handleLogout}
            />
            <main className="main-content">
                <Header />
                <MarketingContent stats={stats} />
            </main>
        </div>
    );
}
