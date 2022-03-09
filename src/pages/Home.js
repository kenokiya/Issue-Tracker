import React from "react";
import NormalLayout from "../components/NormalLayout";
import { MdOutlineFrontHand } from "react-icons/md";
import { FiAtSign } from "react-icons/fi";
import { IssueContainer } from "../components/Home/IssueContainer";
import BoldText from "../components/general/Typography/Bold";
import { Link } from "react-router-dom";
import { IssuesCard } from "../components/Home/IssuesCard";

export const Home = () => {
  return (
    <NormalLayout>
      {/* issue cards */}
      <div className="flex justify-between px-3">
        {/* my issues */}
        <Link to="/my_issues">
          <IssuesCard
            icon={<MdOutlineFrontHand />}
            numberIssues={12}
            title="My Issues"
          />
        </Link>

        {/* tagged issues */}
        <Link to="/tagged">
          <IssuesCard
            icon={<FiAtSign />}
            numberIssues={4}
            title="Tagged Issues"
          />
        </Link>
      </div>

      {/* grouped issues issues: */}
      <div className="flex flex-col gap-3 px-3 mt-2">
        {/* title */}
        <BoldText className="text-xl">General Issues Today</BoldText>

        {/* issues list */}
        <div className="flex flex-col gap-3">
          <Link to="/my_issues">
            <IssueContainer
              title={`Raised  Issues`}
              timestamp={"Feb 03 2022"}
              numberIssues={8}
              tasks="12 tasks"
            />
          </Link>

          <Link to="/resolved">
            <IssueContainer
              title={`Resolved  Issues`}
              timestamp={"Feb 03 2022"}
              numberIssues={12}
              tasks="12 tasks"
            />
          </Link>

          <Link to="/unresolved">
            <IssueContainer
              title={`Unresolved  Issues`}
              timestamp={"Feb 03 2022"}
              numberIssues={6}
              tasks="12 tasks"
            />
          </Link>
        </div>
      </div>
    </NormalLayout>
  );
};
