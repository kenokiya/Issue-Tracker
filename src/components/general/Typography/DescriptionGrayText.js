import React from "react";

export const DescriptionGrayText = ({ children }) => {
  return (
    <p className=" text-gray-700 px-1" style={{ fontSize: "13px" }}>
      {children}
    </p>
  );
};
