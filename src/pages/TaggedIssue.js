import React from "react";
import { LightWrapper } from "../components/general/LightWrapper";
import { Wrapper } from "../components/general/Wrapper";
import { AiOutlineCalendar } from "react-icons/ai";
import NormalLayout from "../components/NormalLayout";
import { TaggedIssueCard } from "../components/issues/TaggedIssueCard";

export const TaggedIssue = () => {
  return (
    <NormalLayout
      navigation={{ title: "Raised Issues", showBack: true, showFilter: true }}
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
        <div className="flex flex-col gap-1">
          <TaggedIssueCard />
          <TaggedIssueCard />
        </div>
      </div>
    </NormalLayout>
  );
};
