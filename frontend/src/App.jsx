import { BrowserRouter, Routes, Route } from "react-router-dom";
import Register from "./pages/Register";
import Login from "./pages/Login";
import Dashboard from "./pages/Dashboard";
import PrivateRoute from "./components/PrivateRoute";
import NasabahDashboard from "./pages/NasabahDashboard";
import Pengajuan from "./pages/Pengajuan"; // import form pengajuan
import Profile from "./pages/Profile";

export default function App() {
    return (
        <BrowserRouter>
            <Routes>
                <Route path="/register" element={<Register />} />
                <Route path="/login" element={<Login />} />

                {/* Dashboard user */}
                <Route
                    path="/dashboard"
                    element={
                        <PrivateRoute>
                            <Dashboard />
                        </PrivateRoute>
                    }
                />

                {/* Dashboard admin */}
                <Route
                    path="/"
                    element={
                        <PrivateRoute>
                            <NasabahDashboard />
                        </PrivateRoute>
                    }
                />

                {/* Form pengajuan */}
                <Route
                    path="/pengajuan"
                    element={
                        <PrivateRoute>
                            <Pengajuan />
                        </PrivateRoute>
                    }
                />
                <Route
                    path="/settings"
                    element={
                        <PrivateRoute>
                            <Profile />
                        </PrivateRoute>
                    }
                />
            </Routes>
        </BrowserRouter>
    );
}
