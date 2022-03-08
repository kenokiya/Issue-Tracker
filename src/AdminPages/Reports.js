import React from "react";
import { AdminLayout } from "../components/admin/AdminLayout";
import Bold from "../components/general/Typography/Bold";
import { IssueCard } from "./Admin";
import { MdOutlineBackHand } from "react-icons/md";
import { GoAlert } from "react-icons/go";
import { BiCheckShield } from "react-icons/bi";
import { BsShopWindow } from "react-icons/bs";
import { FaShopify } from "react-icons/fa";
import { MdDirectionsBike } from "react-icons/md";
import SmallGrayText from "../components/general/Typography/SmallGrayText";

export const Reports = () => {
  return (
    <AdminLayout navigation={{ title: "Reports" }}>
      {/* Issues */}
      <div className="p-4">
        {/* header */}
        <div className="flex justify-between">
          <Bold className="text-2xl">Issues</Bold>
        </div>

        <div className="flex flex-col my-3 gap-4">
          {/* resolve percentage */}
          <div className="flex gap-5">
            <IssueCard className="bg-white">
              <div className="p-2 text-blue-800 font-bold text-2xl">30%</div>

              <span className="text-xs font-medium">Raised Issues</span>

              <SmallGrayText>
                <span style={{ fontSize: "9px" }}>30 raised 10 solved</span>
              </SmallGrayText>
            </IssueCard>

            <IssueCard className="bg-white">
              <div className="p-2 text-blue-800 font-bold text-2xl">5.5</div>

              <span className="text-xs font-medium">Avg. issues per day</span>
            </IssueCard>
          </div>

          {/* issues */}
          <div className="flex justify-around">
            <IssueCard className="bg-blue-100">
              <div className="p-2 rounded-full bg-blue-800">
                <MdOutlineBackHand className="text-2xl text-white" />
              </div>
              <span className="text-xs font-medium">issues solved</span>

              <Bold>30</Bold>
            </IssueCard>

            <IssueCard className="bg-red-100">
              <div className="p-2 rounded-full bg-red-500">
                <GoAlert className="text-2xl text-white" />
              </div>
              <span className="text-xs font-medium">Unresolved</span>

              <Bold>30</Bold>
            </IssueCard>

            <IssueCard className="bg-orange-100">
              <div className="p-2 rounded-full bg-yellow">
                <BiCheckShield className="text-3xl text-white" />
              </div>

              <span className="text-xs font-medium">Solved Issues</span>

              <Bold>30</Bold>
            </IssueCard>
          </div>
        </div>
      </div>

      {/* Issues */}
      <div className="p-4">
        {/* header */}
        <div className="flex justify-between mb-3">
          <Bold className="text-lg">Issues based on Services</Bold>
        </div>

        {/* issues */}
        <div className="flex justify-around">
          <IssueCard className="bg-green-100">
            <div className="p-2 rounded-full bg-success-green">
              <BsShopWindow className="text-2xl text-white" />
            </div>
            <span className="text-xs font-medium">issues solved</span>

            <Bold>30</Bold>
          </IssueCard>

          <IssueCard className="bg-white">
            <div className="p-2 rounded-full bg-gray-400">
              <FaShopify className="text-2xl text-white" />
            </div>
            <span className="text-xs font-medium">Rent a shelf</span>

            <Bold>30</Bold>
          </IssueCard>

          <IssueCard className="bg-sky-100">
            <div
              className="p-2 rounded-full "
              style={{ backgroundColor: "#0072A334" }}
            >
              <MdDirectionsBike className="text-3xl text-white" />
            </div>

            <span className="text-xs font-medium">Solved Issues</span>

            <Bold>30</Bold>
          </IssueCard>
        </div>
      </div>
    </AdminLayout>
  );
};
