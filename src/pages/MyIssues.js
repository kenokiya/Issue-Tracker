import React from "react";
import { LightWrapper } from "../components/general/LightWrapper";
import { Wrapper } from "../components/general/Wrapper";
import { AiOutlineCalendar } from "react-icons/ai";
import NormalLayout from "../components/NormalLayout";
import { PostedIssue } from "../components/issues/PostedIssue";

/**
 * View list of issues that you previously posted
 * Click issue to view its replies
 */

const MyIssues = () => {
  return (
    <NormalLayout
      navigation={{ title: "My Issues", showBack: true, showFilter: true }}
    >
      <div className="px-2">
        <div>
          <Wrapper className=" flex justify-around p-2">
            <LightWrapper className="p-2 gap-3 text-sm min-w-28 px-5">
              <AiOutlineCalendar className=" text-yellow text-base" />
              Today
            </LightWrapper>
            <LightWrapper className="p-2 gap-3 justify-start text-sm w-32  px-5">
              Service
            </LightWrapper>
          </Wrapper>
        </div>

        {/* posted issues */}
        <div className="">
          <PostedIssue />

          <PostedIssue />
        </div>
      </div>
    </NormalLayout>
  );
};

export default MyIssues;
