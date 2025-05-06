import React from "react";
import { Outlet } from "react-router-dom";
import Navbar from "../components/Navbar";
import Footer from "../components/Footer";
import WhatsAppPopup from "../components/PopUp/WhatsAppPopup";
import ScrollToTop from "../components/ScrollToTop/ScrollToTop";

function Layout() {
  return (
    <>
      <ScrollToTop />
      <Navbar />
      <div className="relative ">
        <Outlet />
        <div className="fixed z-50 bottom-8 right-0">
          <WhatsAppPopup />
        </div>
      </div>

      <Footer />
    </>
  );
}

export default Layout;
