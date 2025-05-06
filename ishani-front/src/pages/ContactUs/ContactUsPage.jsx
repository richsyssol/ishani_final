import React from "react";
import { useEffect, useState } from "react";
import axios from "axios";
import { motion } from "framer-motion";
import { fadeIn, staggerContainer, zoomIn } from "../../utils/motion";
import {
  FaFacebookF,
  FaTwitter,
  FaYoutube,
  FaInstagram,
  FaWhatsapp,
} from "react-icons/fa";
import { MdOutlineEmail, MdOutlineFactory } from "react-icons/md";
import {
  IoLocationOutline,
  IoCallOutline,
  IoStorefrontOutline,
} from "react-icons/io5";

const ContactUsPage = () => {
  const socialIcons = [
    { icon: FaFacebookF, label: "Facebook", url: "#" },
    { icon: FaTwitter, label: "Twitter", url: "#" },
    { icon: FaYoutube, label: "YouTube", url: "#" },
    { icon: FaInstagram, label: "Instagram", url: "#" },
    { icon: FaWhatsapp, label: "WhatsApp", url: "#" },
  ];

  const [contactData, setContactData] = useState(null);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    const fetchData = async () => {
      try {
        const response = await axios.get("https://ishanib.demovoting.com/api/contact");
        console.log(response);
        setContactData(response.data || null);
      } catch (error) {
        console.error("Error fetching contact information:", error);
        setContactData(null);
      } finally {
        setLoading(false);
      }
    };

    fetchData();
  }, []);

  if (loading) {
    return (
      <div className="h-[600px] flex items-center justify-center text-gray-500">
        Loading...
      </div>
    );
  }

  return (
    <motion.div
      initial="hidden"
      whileInView="show"
      viewport={{ once: true }}
      className="max-w-7xl mt-24 mx-auto px-4 sm:px-6 lg:px-8 py-12"
    >
      {/* Page Header */}
      <motion.div
        variants={fadeIn("up", "spring", 0.1, 1)}
        className="text-center mb-16"
      >
        <h1 className="text-4xl font-bold text-gray-900 mb-4">
          Contact Ishani Enterprises
        </h1>
        <div className="w-24 h-1 bg-yellow-500 mx-auto"></div>
        <p className="text-gray-600 mt-4 max-w-2xl mx-auto">
          Get in touch with our team for inquiries, support, or to visit our
          facilities
        </p>
      </motion.div>

      {/* Main Content */}
      <div className="grid grid-cols-1 lg:grid-cols-2 gap-12">
        {/* Left Column - Contact Form */}
        <motion.div
          variants={fadeIn("right", "spring", 0.2, 1)}
          className="bg-white p-8 rounded-xl shadow-md"
        >
          <h2 className="text-2xl font-bold text-gray-800 mb-6">
            Send Us a Message
          </h2>
          <form className="space-y-4">
            <div>
              <label
                htmlFor="name"
                className="block text-sm font-medium text-gray-700 mb-1"
              >
                Full Name *
              </label>
              <input
                type="text"
                id="name"
                className="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-yellow-500 focus:border-yellow-500"
                required
              />
            </div>

            <div>
              <label
                htmlFor="email"
                className="block text-sm font-medium text-gray-700 mb-1"
              >
                Email *
              </label>
              <input
                type="email"
                id="email"
                className="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-yellow-500 focus:border-yellow-500"
                required
              />
            </div>

            <div>
              <label
                htmlFor="phone"
                className="block text-sm font-medium text-gray-700 mb-1"
              >
                Phone Number
              </label>
              <input
                type="tel"
                id="phone"
                className="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-yellow-500 focus:border-yellow-500"
              />
            </div>

            <div>
              <label
                htmlFor="subject"
                className="block text-sm font-medium text-gray-700 mb-1"
              >
                Subject *
              </label>
              <select
                id="subject"
                className="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-yellow-500 focus:border-yellow-500"
                required
              >
                <option value="">Select a subject</option>
                <option value="product-inquiry">Product Inquiry</option>
                <option value="quote">Request a Quote</option>
                <option value="support">Technical Support</option>
                <option value="visit">Schedule a Visit</option>
                <option value="other">Other</option>
              </select>
            </div>

            <div>
              <label
                htmlFor="message"
                className="block text-sm font-medium text-gray-700 mb-1"
              >
                Message *
              </label>
              <textarea
                id="message"
                rows={4}
                className="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-yellow-500 focus:border-yellow-500"
                required
              ></textarea>
            </div>

            <button
              type="submit"
              className="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-medium py-2 px-4 rounded-md transition-colors"
            >
              Send Message
            </button>
          </form>
        </motion.div>

        {/* Right Column - Contact Info */}
        <motion.div variants={fadeIn("left", "spring", 0.2, 1)}>
          {/* Contact Details */}
          <div className="bg-gray-50 p-8 rounded-xl shadow-sm mb-8">
            <h2 className="text-2xl font-bold text-gray-800 mb-6">
              Contact Information
            </h2>

            <div className="space-y-4">
              <div className="flex items-start gap-4">
                <IoCallOutline size={24} className="text-yellow-500 mt-1" />
                <div>
                  <h3 className="font-semibold text-gray-800">Phone</h3>
                  <p className="text-gray-600">
                    {contactData?.tel_number || "Not provided"}
                  </p>
                  <p className="text-gray-600">
                    {contactData?.mobile_number || "Not provided"}
                  </p>
                </div>
              </div>

              <div className="flex items-start gap-4">
                <MdOutlineEmail size={24} className="text-yellow-500 mt-1" />
                <div>
                  <h3 className="font-semibold text-gray-800">Email</h3>
                  <p className="text-gray-600">
                    {contactData?.email || "Not provided"}
                  </p>
                </div>
              </div>

              <div className="flex items-start gap-4">
                <FaWhatsapp size={24} className="text-yellow-500 mt-1" />
                <div>
                  <h3 className="font-semibold text-gray-800">WhatsApp</h3>
                  <p className="text-gray-600">
                    {contactData?.whatsapp_number || "Not provided"}
                  </p>
                </div>
              </div>
            </div>

            {/* Social Media */}
            <div className="mt-8">
              <h3 className="font-semibold text-gray-800 mb-4">
                Connect With Us
              </h3>
              <div className="flex gap-4">
                {socialIcons.map(({ icon: Icon, label, url }, index) => (
                  <a
                    key={index}
                    href={url}
                    target="_blank"
                    rel="noopener noreferrer"
                    className="bg-white p-3 rounded-full shadow-sm hover:bg-yellow-100 text-gray-600 hover:text-yellow-600 transition-colors"
                    title={label}
                  >
                    <Icon size={20} />
                  </a>
                ))}
              </div>
            </div>
          </div>

          <div className="space-y-6">
            <div className="bg-white p-6 rounded-xl shadow-sm">
              <div className="flex items-center gap-3 mb-4">
                <IoLocationOutline size={24} className="text-yellow-500" />
                <h3 className="text-xl font-semibold text-gray-800">
                  Corporate Office
                </h3>
              </div>
              <address className="text-gray-600 not-italic pl-9">
                {contactData?.corporate_address_line1 || "Not provided"}
                <br />
                {contactData?.corporate_address_line2 || "Not provided"}
                <br />
                {contactData?.corporate_address_line3 || "Not provided"}
                <br />
                {contactData?.corporate_address_line4 || "Not provided"}
                <br />
                {contactData?.corporate_address_line5 || "Not provided"}
              </address>
            </div>

            <div className="bg-white p-6 rounded-xl shadow-sm">
              <div className="flex items-center gap-3 mb-4">
                <MdOutlineFactory size={24} className="text-yellow-500" />
                <h3 className="text-xl font-semibold text-gray-800">
                  Factory Address
                </h3>
              </div>
              <address className="text-gray-600 not-italic pl-9">
                {contactData?.factory_address_line1 || "Not provided"}
                <br />
                {contactData?.factory_address_line2 || "Not provided"}
                <br />
                {contactData?.factory_address_line3 || "Not provided"}
                <br />
                {contactData?.factory_address_line4 || "Not provided"}
                <br />
                {contactData?.factory_address_line5 || "Not provided"}
              </address>
            </div>

            <div className="bg-white p-6 rounded-xl shadow-sm">
              <div className="flex items-center gap-3 mb-4">
                <IoStorefrontOutline size={24} className="text-yellow-500" />
                <h3 className="text-xl font-semibold text-gray-800">
                  Outlet Address
                </h3>
              </div>
              <address className="text-gray-600 not-italic pl-9">
                {contactData?.outlet_address_line1 || "Not provided"}
                <br />
                {contactData?.outlet_address_line2 || "Not provided"}
                <br />
                {contactData?.outlet_address_line3 || "Not provided"}
                <br />
                {contactData?.outlet_address_line4 || "Not provided"}
                <br />
                {contactData?.outlet_address_line5 || "Not provided"}
              </address>
            </div>
          </div>
        </motion.div>
      </div>

      {/* Google Map Section */}
      <motion.section
        variants={fadeIn("up", "spring", 0.3, 1)}
        className="mt-16 bg-gray-50 rounded-xl overflow-hidden"
      >
        <h2 className="text-2xl font-bold text-gray-800 mb-6 px-8 pt-8">
          Our Locations
        </h2>
        <div className="grid grid-cols-1 md:grid-cols-2 gap-8 p-8">
          {/* Corporate Office Map */}
          <div>
            <h3 className="text-lg font-semibold text-gray-800 mb-4">
              Corporate Office
            </h3>
            <div className="h-64 bg-gray-200 rounded-lg overflow-hidden">
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7500.623762404022!2d73.837825!3d19.953382!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m3!3e0!4m0!4m0!5e0!3m2!1sen!2sus!4v1744176631879"
                width="100%"
                height="100%"
                style={{ border: 0 }}
                allowFullScreen=""
                loading="lazy"
                title="Ishani Enterprises Corporate Office"
              ></iframe>
            </div>
          </div>

          {/* Factory Map */}
          <div>
            <h3 className="text-lg font-semibold text-gray-800 mb-4">
              Factory Location
            </h3>
            <div className="h-64 bg-gray-200 rounded-lg overflow-hidden">
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3749.222747658461!2d73.762277!3d19.997712!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bddebaf2b9f1a9f%3A0x4f01bba3e5f7a3e0!2sMIDC%20Industrial%20Area%2C%20Satpur%2C%20Nashik%2C%20Maharashtra%20422007!5e0!3m2!1sen!2sin!4v1712345678901"
                width="100%"
                height="100%"
                style={{ border: 0 }}
                allowFullScreen=""
                loading="lazy"
                title="Ishani Enterprises Factory Location"
              ></iframe>
            </div>
          </div>
        </div>

        {/* Schema Markup (invisible) */}
        <script type="application/ld+json">
          {`
            {
              "@context": "https://schema.org",
              "@type": "Organization",
              "name": "Ishani Enterprises",
              "url": "https://www.ishanienterprises.com",
              "logo": "https://www.ishanienterprises.com/logo.png",
              "description": "Manufacturer of premium French doors and windows",
              "address": {
                "@type": "PostalAddress",
                "streetAddress": "G-8, Prestige Bytco Business Center, Bytco Point, Nasik Road",
                "addressLocality": "Nashik",
                "addressRegion": "Maharashtra",
                "postalCode": "422101",
                "addressCountry": "IN"
              },
              "contactPoint": [
                {
                  "@type": "ContactPoint",
                  "telephone": "+912532465140",
                  "contactType": "customer service",
                  "email": "ishanient@gmail.com",
                  "areaServed": "IN"
                }
              ],
              "sameAs": [
                "https://www.facebook.com/ishanienterprises",
                "https://www.twitter.com/ishanient",
                "https://www.instagram.com/ishanienterprises",
                "https://www.youtube.com/ishanienterprises"
              ]
            }
          `}
        </script>
      </motion.section>
    </motion.div>
  );
};

export default ContactUsPage;
